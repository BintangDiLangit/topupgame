@extends('errors.custom_layouts.master')

@section('content')
    <section class="breadcrumb-area mb-5" data-background="assets/img/bg/breadcrumb_bg01.jpg">
        <div class="container">
            <div class="breadcrumb__wrapper">
                <div class="row">
                    <div class="col-xl-12 col-lg-7">
                        <div class="breadcrumb__content">
                            <h2 class="title wow fadeInUp" data-wow-delay=".5s">Term & Service</h2>
                            <p class="mt-5">
                                Selamat datang di platform Top Up Game dan PPOB ("Platform"). Dalam menggunakan Platform
                                ini, Anda dianggap telah membaca, memahami, dan menyetujui semua ketentuan dalam Term of
                                Service ini. Jika Anda tidak menyetujui ketentuan ini, Anda tidak diperbolehkan menggunakan
                                Platform ini.
                            </p>
                            <b class="text-warning">Penggunaan Platform</b><br> 
                            <p>
                                a. Anda diperbolehkan menggunakan Platform ini untuk melakukan top up game dan PPOB, serta
                                melakukan transaksi lainnya yang diizinkan oleh Platform.
                            </p>
                            <p>
                                b. Anda bertanggung jawab atas keamanan akun Anda, termasuk penggunaan kata sandi yang kuat
                                dan tidak memberikan akses akun Anda kepada orang lain.
                            </p>
                            <p>
                                c. Anda dilarang menggunakan Platform ini untuk tujuan ilegal, termasuk namun tidak terbatas
                                pada penipuan, pelanggaran hak cipta, atau tindakan yang merugikan orang lain.
                            </p>
                            <b class="text-warning">Top Up Game dan PPOB</b><br>
                            <p>
                                a. Anda dapat menggunakan Platform ini untuk melakukan top up game dan PPOB, termasuk
                                pembayaran tagihan listrik, air, telepon, internet, dan lain-lain.
                            </p>
                            <p>
                                b. Setiap transaksi yang dilakukan melalui Platform ini harus dilakukan dengan benar dan
                                tidak menyalahi hukum atau aturan yang berlaku.
                            </p>
                            <p>
                                c. Platform ini tidak bertanggung jawab atas kesalahan transaksi yang disebabkan oleh
                                informasi yang salah atau tidak lengkap yang diberikan oleh pengguna.
                            </p>
                            <b class="text-warning">Pembayaran</b>
                            <p>
                                a. Anda harus membayar jumlah yang telah ditentukan untuk setiap transaksi yang dilakukan
                                melalui Platform ini.
                            </p>
                            <p>
                                b. Platform ini dapat menawarkan berbagai metode pembayaran yang tersedia, termasuk kartu
                                kredit, transfer bank, atau metode pembayaran lainnya yang disetujui oleh Platform.
                            </p>
                            <p>
                                c. Jika terjadi masalah dalam pembayaran, Anda harus menghubungi layanan pelanggan Platform
                                untuk menyelesaikan masalah tersebut.
                            </p>
                            <b class="text-warning">Perubahan Ketentuan</b><br>
                            <p>
                                a. Platform ini berhak untuk mengubah Ketentuan Layanan ini sewaktu-waktu tanpa
                                pemberitahuan terlebih dahulu.
                            </p>
                            <p>
                                b. Setiap perubahan Ketentuan Layanan ini akan berlaku segera setelah diumumkan di Platform
                                ini.
                            </p>
                            <p>
                                c. Dengan terus menggunakan Platform ini setelah perubahan Ketentuan Layanan ini diumumkan,
                                Anda dianggap telah menyetujui perubahan tersebut.
                            </p>
                            <b class="text-warning">Pembatasan Tanggung Jawab</b>
                            <p>
                                a. Platform ini tidak bertanggung jawab atas kerugian atau kerusakan yang timbul dari
                                penggunaan Platform ini, termasuk namun tidak terbatas pada kerugian keuangan, kerugian
                                bisnis, atau kerugian data.
                            </p>
                            <p>
                                b. Anda menyetujui untuk tidak menuntut Platform ini atas setiap klaim, tuntutan, kerugian,
                                atau biaya yang timbul dari penggunaan Platform ini.
                            </p>
                            <b class="text-warning">Hukum yang Berlaku</b><br>
                            <p>
                                a. Ketentuan Layanan ini tunduk pada hukum yang berlaku di Indonesia.
                            </p>
                            <p>
                                b. Setiap perselisihan yang timbul dari atau terkait dengan penggunaan Platform ini akan
                                diselesaikan melalui mekanisme penyelesaian sengketa yang disetujui oleh Platform ini.
                            </p>
                            <p>
                                Demikian
                            </p>
                        </div>
                    </div>
                    <div class="col text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
