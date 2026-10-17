import os
import time
import pandas as pd
import pymupdf
from paddleocr import PaddleOCR
from unstructured.partition.auto import partition

# 1. KONFIGURASI PATH
FOLDER_DOKUMEN = "dokumen_sumber"
FOLDER_OUTPUT = "hasil_ekstraksi" 
FILE_MAPPING = "mapping.csv"

# Buat folder output jika belum ada
os.makedirs(FOLDER_OUTPUT, exist_ok=True)

# Inisialisasi model PaddleOCR
print("Memuat model PaddleOCR...")
ocr = PaddleOCR(use_textline_orientation=True, lang='id')

# 2. FUNGSI PEMBANTU
def cari_path_file(nama_file, folder_utama):
    for root, dirs, files in os.walk(folder_utama):
        if nama_file in files:
            return os.path.join(root, nama_file)
    return None

def is_native_pdf(file_path, min_char_per_page=50):
    # PENTING: Cek dulu apakah ini PDF. Jika bukan (misal .png, .jpg), PASTI bukan native!
    if not file_path.lower().endswith('.pdf'):
        return False
        
    try:
        doc = pymupdf.open(file_path)
        if not doc:
            return False
        
        total_text = "".join([page.get_text().strip() for page in doc])
        avg_char_per_page = len(total_text) / len(doc) if len(doc) > 0 else 0
        return avg_char_per_page > min_char_per_page
    except Exception as e:
        print(f"[!] Gagal membaca metadata PDF: {e}")
        return False # Fallback ke PaddleOCR jika file rusak

# 3. FUNGSI EKSTRAKSI (SMART ROUTER)
def run_paddleocr(path_dokumen):
    teks_hasil = ""
    try:
        hasil_ocr = ocr.predict(path_dokumen)

        if hasil_ocr:
            for halaman in hasil_ocr:
                # Jika hasil berupa dictionary atau objek yang memiliki 'rec_texts'
                if isinstance(halaman, dict) and 'rec_texts' in halaman:
                    for teks in halaman['rec_texts']:
                        teks_hasil += str(teks) + "\n"
                # Fallback alternatif jika strukturnya berupa list biasa
                elif isinstance(halaman, list):
                    for item in halaman:
                        if isinstance(item, dict) and 'rec_texts' in item:
                            for teks in item['rec_texts']:
                                teks_hasil += str(teks) + "\n"

        if not teks_hasil.strip():
            teks_hasil = str(hasil_ocr)
            
    except Exception as e:
        return f"[ERROR PADDLEOCR]: {e}"
        
    return teks_hasil.strip()

def run_unstructuredio_auto(path_dokumen):
    try:
        elemen_auto = partition(
            filename=path_dokumen,
            strategy="auto",
            languages=["ind"],
            ocr_agent="unstructured.partition.utils.ocr_models.paddle_ocr.OCRAgentPaddle"
        )
        return "\n".join([str(elemen) for elemen in elemen_auto])
    except Exception as e:
        return f"[ERROR UNSTRUCTURED.IO]: {e}"

def extract_pdf_smart(file_path):
    if is_native_pdf(file_path):
        print("-> Rute: Native PDF (Menggunakan Unstructured.io Auto)")
        return run_unstructuredio_auto(file_path)
    else:
        print("-> Rute: Scanned/Gambar (Menggunakan PaddleOCR)")
        return run_paddleocr(file_path)

# 4. EKSEKUSI PIPELINE EKSTRAKSI
print("\nMemulai Eksekusi Pipeline Ekstraksi")
waktu_mulai = time.time()

df = pd.read_csv(FILE_MAPPING)

for index, row in df.iterrows():
    doc_id = row['ID']
    nama_file = row['Nama_File']

    print(f"\n[{index+1}/{len(df)}] Memproses: {nama_file}")
    
    path_dokumen = cari_path_file(nama_file, FOLDER_DOKUMEN)
    if not path_dokumen:
        print(f"[!] Gagal: File sumber tidak ditemukan di dalam '{FOLDER_DOKUMEN}'.")
        continue

    # 4a. Mulai Ekstraksi
    teks_hasil = extract_pdf_smart(path_dokumen)

    if not teks_hasil.strip():
        teks_hasil = "[INFO: Teks gagal diekstrak / dokumen kosong / file rusak]"

    # 4b. Simpan langsung ke hasil_ekstraksi
    nama_output = f"{doc_id}.txt"
    path_output = os.path.join(FOLDER_OUTPUT, nama_output)

    with open(path_output, "w", encoding="utf-8") as f:
        f.write(teks_hasil)
        
    print(f"[v] Selesai -> {nama_output}")

# 5. SELESAI
durasi = time.time() - waktu_mulai
jam, sisa = divmod(durasi, 3600)
menit, detik = divmod(sisa, 60)

print(f"\nSELESAI")
print(f"Waktu total eksekusi: {int(jam)} jam {int(menit)} menit {detik:.2f} detik")
print(f"Output tersimpan di: {FOLDER_OUTPUT}/")