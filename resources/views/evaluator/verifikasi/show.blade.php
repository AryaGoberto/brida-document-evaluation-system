<x-app-layout>
    <!-- SPLIT-SCREEN WORKSPACE CONTAINER (FULL VIEWPORT) -->
    <div 
        class="flex flex-col h-[calc(100vh-4.1rem)] bg-slate-100 overflow-hidden select-none"
        x-data="{
            activeNo: 1,
            zoomLevel: 100,
            searchDoc: '',
            pdfPage: 2,
            totalPages: 5,
            highlightActive: true,
            viewMode: 'pdf',
            totalMaxBobot: {{ $totalSkorMaks }},
            indicators: {{ Js::from($indikatorVerifikasi) }},
            showSuccessToast: false,
            toastMessage: '',

            init() {
                this.updateActiveDoc();
            },

            getActive() {
                return this.indicators[this.activeNo];
            },

            updateActiveDoc() {
                this.pdfPage = this.getActive().halaman || 1;
                if (this.getActive().has_real_file) {
                    this.viewMode = 'pdf';
                }
            },

            selectIndikator(no) {
                this.activeNo = no;
                this.updateActiveDoc();
                this.highlightActive = true;
            },

            setujuiAi(no) {
                let ind = this.indicators[no];
                ind.verifikasi_status = 'approved';
                ind.final_bintang = ind.ai_bintang;
                ind.is_correcting = false;
                ind.catatan_evaluator = 'Disetujui sesuai klaim ekstraksi bukti AI.';
                
                this.toastMessage = 'Indikator ' + no + ' berhasil disetujui sesuai rekomendasi AI.';
                this.showSuccessToast = true;
                setTimeout(() => { this.showSuccessToast = false; }, 3000);
            },

            mulaiKoreksi(no) {
                let ind = this.indicators[no];
                ind.is_correcting = true;
                if (!ind.temp_bintang) {
                    ind.temp_bintang = ind.final_bintang || ind.ai_bintang;
                }
                if (!ind.temp_catatan) {
                    ind.temp_catatan = ind.catatan_evaluator || '';
                }
            },

            batalKoreksi(no) {
                this.indicators[no].is_correcting = false;
            },

            simpanKoreksi(no) {
                let ind = this.indicators[no];
                if (!ind.temp_catatan || ind.temp_catatan.trim() === '') {
                    alert('Wajib menyertakan kolom Catatan Evaluator sebagai alasan koreksi skor!');
                    return;
                }
                ind.verifikasi_status = 'corrected';
                ind.final_bintang = parseInt(ind.temp_bintang);
                ind.catatan_evaluator = ind.temp_catatan;
                ind.is_correcting = false;

                this.toastMessage = 'Koreksi manual Indikator ' + no + ' berhasil disimpan.';
                this.showSuccessToast = true;
                setTimeout(() => { this.showSuccessToast = false; }, 3000);
            },

            getTotalVerifikasiSkor() {
                let total = 0;
                for (let k in this.indicators) {
                    let item = this.indicators[k];
                    let bintang = item.final_bintang || item.ai_bintang;
                    total += (bintang * item.bobot);
                }
                return total;
            },

            getPersentaseVerifikasi() {
                let total = this.getTotalVerifikasiSkor();
                return this.totalMaxBobot > 0 ? (total / this.totalMaxBobot * 100).toFixed(1) : 0;
            },

            getJumlahDitelaah() {
                let count = 0;
                for (let k in this.indicators) {
                    if (this.indicators[k].verifikasi_status !== 'pending') count++;
                }
                return count;
            }
        }"
    >

        <!-- 1. Header Administratif & Status Verifikasi -->
        @include('evaluator.partials._verifikasi._verifikasi_header')

        <!-- 2. Workspace Dua Panel (Split-Screen) -->
        <div class="flex-1 flex flex-col lg:flex-row overflow-hidden">
            <!-- Panel Kiri: PDF Viewer & Simulasi Kertas Dokumen -->
            @include('evaluator.partials._verifikasi._verifikasi_pdf_viewer')

            <!-- Panel Kanan: Daftar 19 Indikator & Keputusan Validasi -->
            @include('evaluator.partials._verifikasi._verifikasi_indicators_panel')
        </div>

        <!-- 3. Toast Notifikasi Interaktif -->
        @include('evaluator.partials._verifikasi._verifikasi_toast')

    </div>
</x-app-layout>
