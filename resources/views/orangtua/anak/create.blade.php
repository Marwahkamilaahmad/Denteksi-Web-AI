@extends('layout.master')
@section('title') pemeriksaan @endsection

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="row mt-5">
                <div class="col-md-6 mx-3 mb-3 align-self-center">
                    <h5 class="mb-3 mb-md-0 text-left">TAMBAH PASIEN</h5>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('tambahanak.store') }}" class="forms-sample" id="form-anak" method="post"
                    enctype="multipart/form-data" files=true>
                    @csrf

                    <div class="row col-md-10 mb-3 mx-0">
                        <label for="exampleInputPassword1" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autocomplete="off"
                           value="{{old('nama')}}" placeholder="Nama">
                           @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                    </div>
 {{--                   <div class="mb-3 gender">
                        <label class="col-md-12 mb-2"> Jenis Kelamin <span class="text-danger">*</span> </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" value="laki-laki" name="jenis_kelamin" id="radioInline">
                            <label class="form-check-label" for="radioInline">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" value="perempuan" class="form-check-input" name="jenis_kelamin" id="radioInline1">
                            <label class="form-check-label" for="radioInline1">
                                Perempuan
                            </label>
                        </div>
                        <div class="error-placement"></div>
                    </div>
                    --}}

                    <div class="row">
                     {{--   <div class="col-md-5">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir"
                                    autocomplete="off" placeholder="Masukkan tanggal lahir" value="{{old('tanggal_lahir')}}" max="{{ date('Y-m-d') }}">
                                    @error('tanggal_lahir')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-md-10">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nama orangtua</label>
                                <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua"
                                    autocomplete="off" placeholder="nama orangtua" value="{{old('nama_orangtua')}}">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nomor Whatsapp</label>
                                <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp"
                                    autocomplete="off" placeholder="nomor whatsapp" value="{{old('no_whatsapps')}}" >
                            </div>
                        </div>
                    </div>

                    <!-- Upload image -->
                    <div class="row mt-3">
                        <h5 class="mb-3 mb-md-0 text-left">TAMBAH FOTO</h5>
                    </div>

                    {{-- <div class="row">
                        <div class="row col-md-8 mt-5 mx-auto">
                            <div class="card text-center custom-card shadow py-2">
                                <div class="card-body">
                                    <div class="row mt-3">
                                        <h6 class="mb-3 mb-md-0 text-left">PREVIEW</h6>
                                    </div>
                                    <img id="gigi-depan" src="{{ asset('assets/images/take-a-pict.png') }}" class="img-fluid mt-3" style="width: 400px; height: 200px;" alt="image_cloud">
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="row mt-5">

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Foto gigi dari sisi depan</label>
                            <input type="file"  class="form-control dropify"  data-show-loader="true" data-allowed-file-extensions="jpg png jpeg svg" id="gambar1" name="gambar1" placeholder="masukkan gambar">
                            @error('gambar1')
                            <div class="badge bg-danger mt-2 ">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="row col-md-5 mb-3 mx-auto">
                            <button type="button" class="btn-create btn btn-submit-col" id="btn-modal-cam"> GUNAKAN KAMERA</button>
                            <p class="text-center">atau</p>
                            <label for="fileInput" class="btn btn-submit-white mt-1">
                                <i class="far fa-image"></i> AMBIL DARI GALERI
                                <input id="fileInput" onchange="readURL(this, 'gigi-depan');" type="file" name="gambar1" accept="image/*" style="display: none;">
                            </label>
                        </div> --}}
                    </div>

                    <div class="d-flex justify-content-end mt-5">
                        <button type="button" class="btn btn-primary wd-150 mt-3 button ml-2" style="margin-right: 10px;" id="btn-modal-cam">
                            Scan QR
                        </button>
                        <button type="button" class="btn btn-cancel wd-100 mt-3 button ml-auto" id="btn-cancel">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary wd-150 mt-3 button ml-2" style="margin-left: 10px;" id="btn-periksa">
                            Periksa Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal preview cam -->
<div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>PERIKSA DENGAN SCAN QR</h3>
            </div>
            <div class="modal-body">
                {{-- <video id="camera-preview" class="img-fluid mt-3" style="width: 0px; height: 0px;"></video> --}}
                <div id="qrreader"  width="200px">
                     <!-- (Scan QR content)  -->
                </div>
                <div class="input-group mt-4">
                    <input type="text" id="text_scan_input" class="form-control mt-3" placeholder="your link here" readonly/>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary mt-3" type="button" onclick="browse_url()">Browse</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <!-- <button type="button" class="btn btn-secondary mt-2" id="btn-switch-camera">
                    Switch Kamera
                </button>
                <button type="button" class="btn btn-secondary mt-2" id="btn-take-picture">
                    Snapshoot
                </button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="stopCameraPreview()">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script type="text/javascript">
    let html5QrcodeScanner = new Html5QrcodeScanner(
                    "qrreader",
                    { fps: 10, qrbox: {width: 300, height: 300} },
                    /* verbose= */ false);


    function readURL(input, imageId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#' + imageId).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function ambilDariGaleri() {
        var inputFile = document.createElement('input');
        inputFile.type = 'file';
        inputFile.accept = 'image/*';
        inputFile.style.display = 'none';
        inputFile.name = 'gambar1';

        inputFile.addEventListener('change', function (event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = function (e) {
                $('#gigi-depan').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        });

        document.body.appendChild(inputFile);
        inputFile.click();
        document.body.removeChild(inputFile);
    }

    $(document).ready(function () {
        $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Hapus',

                },
                error: {

                    'imageFormat': 'Format yang diizinkan hanya jpg , jpeg, png , dan svg.'
                }
            });


        $('#tempat_lahir,#nama').on('input', function () {
            var currentVal = $(this).val();
            var capitalizedVal = capitalizeAfterSpace(currentVal);
            $(this).val(capitalizedVal);
        });

        function capitalizeAfterSpace(str) {
            var words = str.split(' ');
            for (var i = 0; i < words.length; i++) {
                if (words[i].length > 0) {
                    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                }
            }
            return words.join(' ');
        }

        $("#form-anak").validate({
            rules: {
                nama: "required",
                tempat_lahir: "required",
                tanggal_lahir: "required",
                jenis_kelamin: "required",
            },
            messages: {
                nama: "Nama wajib diisi",
                tempat_lahir: "Tempat lahir wajib diisi",
                tanggal_lahir: "Tanggal lahir wajib diisi",
                jenis_kelamin: "Jenis kelamin wajib diisi",
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "jenis_kelamin") {
                    error.appendTo(element.parents('.gender').find('.error-placement'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $('#btn-ambil-dari-galeri').on('click', function () {
            ambilDariGaleri();
        });

    });

    $(document).ready(function () {
        $('#btn-cancel').on('click', function () {
            window.history.back();
        });

        $('#btn-modal-cam').on('click', function () {
            requestCameraPermission();
        });

        // $('#btn-switch-camera').on('click', function () {
        //     switchCamera();
        // });

        // $('#btn-take-picture').on('click', function () {
        //     takePicture();
        // });

    });

    var currentStream;
    // var videoElement = document.getElementById('camera-preview');

    function requestCameraPermission() {
        // navigator.mediaDevices.getUserMedia({ video: true })
        //     .then(function (stream) {
        //         // currentStream = stream;
                // videoElement.srcObject = stream;

                $('#cameraModal').modal('show');
                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
                var url_code;
                var nama = document.getElementById('nama');
                var nama_orangtua = document.getElementById('nama_orangtua');
                var no_whatsapp = document.getElementById('no_whatsapp');


                function onScanSuccess(decodedText, decodedResult) {
                    console.log(decodedText, decodedResult);
                    $decodedText = decodedText.split('_')
                    $.ajax({
                        url : 'http://127.0.0.1:8000/orangtua/anak/' + $decodedText,
                        method : 'GET',
                        success : function (response) {
                            if (response.data) {
                                var pasienData = response.data;
                                console.log(pasienData);

                                nama.value = pasienData.nama;
                                nama_orangtua.value = pasienData.nama_orangtua;
                                no_whatsapp.value = pasienData.no_whatsapp;

                                html5QrcodeScanner.clear()
                                $('#cameraModal').modal('hide');
                            } else {
                                console.error('Pasien not found');
                                alert('Pasien not found');
                            }
                        },
                        error: function(error) {
                            console.error('Error fetching pasien data:', error);
                            }
                        });
                    }




                function browse_url(){
                    window.open(url_code, "_self")
                }

                function onScanFailure(error) {
                    console.warn(`QR error = ${error}`);
                }


                // rememberLastUsedCamera;


                $('#cameraModal').on('hidden.bs.modal', function () {
                    stopCameraPreview();
                });
            // })
            // .catch(function (error) {
            //     console.error('Error accessing camera: ', error);
            //     alert('Izin kamera diperlukan untuk menggunakan fitur ini.');
            // });
    }

    // function switchCamera() {
    //     if (currentStream) {
    //         currentStream.getTracks().forEach(function (track) {
    //             track.stop();
    //         });
    //     }

    //     requestCameraPermission();
    // }

    // function takePicture() {
    //     console.log('Take Picture called');
    //     if (currentStream) {
    //         var canvas = document.createElement('canvas');
    //         canvas.width = videoElement.videoWidth;
    //         canvas.height = videoElement.videoHeight;
    //         var context = canvas.getContext('2d');
    //         context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

    //         canvas.toBlob(function (blob) {

    //             var formData = new FormData(document.getElementById('form-anak'));
    //             formData.append('gambar1', blob, 'image.png');

    //             updatePreviewCard(blob);
    //             stopCameraPreview();

    //             $.ajax({
    //                 url: "{{ route('tambahanak.store') }}",
    //                 method: 'POST',
    //                 data: formData,
    //                 processData: false,
    //                 contentType: false,
    //                 success: function (response) {
    //                     Swal.fire({
    //                     title: 'Sukses!',
    //                     text: 'Gambar berhasil diupload.',
    //                     icon: 'success',
    //                     confirmButtonText: 'OK'
    //                 }).then((result) => {
    //                     if (result.isConfirmed) {
    //                         location.reload();
    //                     }
    //                     });
    //                 },
    //                 error: function (error) {
    //                     console.error('Error uploading image: ', error);
    //                 }
    //             });
    //         }, 'image/png');
    //     }
    // }

    // function updatePreviewCard(blob) {
    //     var cardElement = document.querySelector('.custom-card');
    //     var previewImageElement = cardElement.querySelector('img');

    //     var imageUrl = URL.createObjectURL(blob);
    //     previewImageElement.src = imageUrl;

    // }

    function stopCameraPreview() {
    //     if (currentStream) {
    //         var tracks = currentStream.getTracks();

    //         tracks.forEach(function (track) {
    //             track.stop();
    //         });

    //         videoElement.srcObject = null;
        html5QrcodeScanner.clear();
        $('#cameraModal').modal('hide');
    //     }
    }

    // let mediaRecorder;
    // let recordedChunks = [];

    // function startRecording(stream) {
    //     mediaRecorder = new MediaRecorder(stream);

    //     mediaRecorder.ondataavailable = function (event) {
    //         if (event.data.size > 0) {
    //             recordedChunks.push(event.data);
    //         }
    //     };

    //     mediaRecorder.onstop = function () {
    //         var blob = new Blob(recordedChunks, { type: 'image/png' });
    //         var url = URL.createObjectURL(blob);

    //         $('#gigi-depan').attr('src', url);

    //         recordedChunks = [];
    //     };

    //     mediaRecorder.start();
    // }

    // function stopRecording() {
    //     if (mediaRecorder.state === 'recording') {
    //         mediaRecorder.stop
    //         }
    //     }


</script>

<script>

    </script>

@endpush
