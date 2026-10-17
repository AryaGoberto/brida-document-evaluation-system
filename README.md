# 🧠 Service AI Pipeline - BRIDA Evaluation System

Cabang (*branch*) ini secara khusus memuat *source code* layanan kecerdasan buatan (AI) yang dirancang untuk di-deploy ke **Hugging Face Spaces**. Layanan ini beroperasi sebagai API mandiri yang bertugas memproses dan mengevaluasi dokumen inovasi daerah (BRIDA).

## ⚙️ Arsitektur Pipeline

Pipeline sistem AI ini dibagi menjadi dua bagian besar:

1. **Extraction (`/extraction`)**
   Modul ini bertanggung jawab untuk membaca dan mengekstrak teks dari dokumen PDF yang diunggah. Modul ini menggunakan algoritma **Smart Routing** (kombinasi PyMuPDF, PaddleOCR, dan Unstructured.io) untuk mendeteksi secara otomatis apakah dokumen tersebut berupa file digital (*Native*) atau gambar hasil *scan*, lalu mengekstraknya menggunakan metode yang paling efisien.

2. **Core AI (`/core`)**
   Modul ini adalah otak utama evaluasi. Setelah teks berhasil diekstrak, modul ini akan mencocokkan isi teks tersebut dengan kriteria indikator penilaian BRIDA menggunakan bantuan *Large Language Model* (LLM) / AI untuk menentukan bobot dan relevansinya.

## 🧪 Eksperimen & Penyempurnaan Kode

Selain kode produksi, *branch* ini juga dilengkapi dengan folder **`experiments/`**. 
Folder ini berisi lingkungan *sandbox* (menggunakan Jupyter Notebook `.ipynb`) beserta dataset sampel (dokumen sumber & hasil ekstraksi teks). Area eksperimen ini sengaja disertakan untuk menguji keakuratan ekstraksi OCR, meracik *prompt* AI, dan menyempurnakan logika program sebelum kode akhirnya diintegrasikan ke *service* produksi.