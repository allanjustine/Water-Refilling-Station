@extends('layouts.subscribers.SubsApp')

@include('layouts.subscribers.Subsidebar')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if (session('settingsUpdate'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('settingsUpdate') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Subscriber Settings</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.settings', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row gy-3 overflow-hidden">
                                <div class="d-flex justify-content-center mb-2">
                                    <img id="previewImg"
                                        @if (auth()->user()->avatar == null) src="data:image/jpeg;base64,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vXEPPBIg068mnUu6DiVBYpjsUejLPdu090Hx+I9AvcHKeUSOpCMFeTPFdI2NuZ3kOJWzsbgJneK2cfVg3iadz3DdJ+AfDzOvAX94DspJO4VFaCG72xHQu5doPhb9zeePEG/taALDQKHEYlKLpwd+r+y7dXzL+BwDclVqq3Rfd/Zep6REWebgREQBERAEREAREQBERAEREAREQBERARONYDBVNtK3vD3Xt0ey/wBl3LobjoqfLs5X0hLqZ/asvubYO/NG45T4g36LoyKalXnTVlp0ea9yrXwdKs96Ss+qyf8APE5oNs5IzkqIAHcjmid+l418lus20hO+OTyyH+VepYmuFnNBHIgEehUZLs3Ru1dSw36MaP2CmWIov5qfo2inLAV18lW//aKfuirybZQ8IX+eQfyVHS7ZveckMTcx3DvPf5NaAruzZaiBuKWLzaD+6kqelZGLRsawcmgNHyXr9TRXy0/V/g8rZ+Ib+Kqku0TnMOBYjVn60mJn+5YekTd/5rK24FspBTWeAZJf9R+pH4BuZ5a8yVYEUNXE1Ki3XkuiyRcw+Ao0XvJXl1eb/wAeQREVcuBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREB//Z"
                                        @else
                                        src="{{ Storage::url(auth()->user()->avatar) }}" @endif
                                        style="width: 100px; height: 100px; border: 3px solid black; object-fit: cover;"
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn text-white bg-primary">
                                        <label for="avatar" class="form-label m-1" style="cursor: pointer;">Update your
                                            station logo</label>
                                        <input id="avatar" type="file"
                                            class="form-control d-none pr-4 @error('avatar') is-invalid @enderror"
                                            name="avatar" value="{{ old('avatar') }}" accept="image/*"
                                            autocomplete="avatar" autofocus onchange="previewImage(event)">
                                    </div>
                                    @error('avatar')
                                        <span class="text-danger ml-1 mt-3" style="font-size: 13px;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Change Name -->
                                <div class="mb-3">
                                    <label for="station" class="form-label">Station</label>
                                    <input type="text" class="form-control" id="station" name="station"
                                        value="{{ auth()->user()->station }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            const previewImg = document.getElementById('previewImg');
            previewImg.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
