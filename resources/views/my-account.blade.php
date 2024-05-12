@extends('layouts.base')
@section('title')
    My Account
@endsection

@section('content')
<section>
    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif 
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h4 class="my-3"> <span style="font-weight:bold">{{ Auth::user()->name }}</span><br><a href="" style="text-decoration:none;color:#ff6426">{{ Auth::user()->email }}</a><br><a style="text-decoration: none;color:#ff6426" href="">{{ Auth::user()->phone_number }}</a></h4>
                    </div>
                </div>
                <div class="card mb-lg-0 text-center">
                    <div class="card-body">
                        <h2 class="text-center mb-2">Updates</h2>
                    </div>
                    @if(session('research'))
                        <div class="alert alert-info alert-dismissible fade show" style="margin: 10px" role="alert">
                            {{ session('research') }}
                        </div>
                    @endif
                    
                    @foreach ($userFoundHisItem as $userFound )
                        <div class="card-body" style="background-color: #d8d0ccda; margin:10px">
                            <h4 class="card-title"><span style="font-weight: bold;color:#ff6426">{{ $userFound->userFound($userFound->user_found)->name }}</span><br>Found Your <span style="font-weight: bold">{{ $userFound->found($userFound->found_id)->description }}</span><br>His email: <a  style="text-decoration:none;font-weight: bold;color:#ff6426" href="/tel">{{ $userFound->userFound($userFound->user_found)->email }}</a><br>And his phone number: <a style="text-decoration:none;font-weight: bold;color:#ff6426" href="/tel">{{ $userFound->userFound($userFound->user_found)->phone_number }}</a><br>Now you can contact him to take your <span style="font-weight: bold">{{ $userFound->found($userFound->found_id)->description }}</span> </h4>
                        </div>
                    @endforeach 
                    @if (!$userMissing->isEmpty())
                        @foreach ($userMissing as $userMissingUpdates)
                            <div class="card-body" style="background-color: #d8d0ccda; margin:10px">
                                <img style="width: 300px" class="card-img-top" src="{{ asset('assets/img') }}/{{ $userMissingUpdates->found($userMissingUpdates->found_id)->image }}" alt="Card image">
                                <h4 class="card-title" style="margin-top:10px">The <span style="font-weight: bold;color:#ff6426">{{ $userMissingUpdates->found($userMissingUpdates->found_id)->description }}</span> Founded <br> in <span style="font-weight: bold;color:#ff6426">{{ $userMissingUpdates->found($userMissingUpdates->found_id)->location }}</span> on <span style="font-weight: bold;color:#ff6426">{{ $userMissingUpdates->found($userMissingUpdates->found_id)->date }}</span></h4>
                                <p class="card-text">Is it yours?</p>
                                <a href="{{ route('app.yes',['id' => $userMissingUpdates->id ]) }}" class="btn btn-success">Yes</a>
                                <a href="{{ route('app.no',['id' => $userMissingUpdates->id ]) }}" class="btn btn-danger">No</a>
                            </div>
                        @endforeach
                    @endif
                    @if (!$userFoundUserMissing->isEmpty())
                        @foreach ($userFoundUserMissing as $userFoundUpdates)
                            <div class="card-body" style="background-color: #d8d0ccda; margin:10px">
                                <h4 class="card-title"> The <span style="font-weight: bold">{{ $userFoundUpdates->found($userFoundUpdates->found_id)->description }}</span> you found<br>belongs to <span style="font-weight: bold;color:#ff6426">{{ $userFoundUpdates->userMissing($userFoundUpdates->user_missing)->name }}</span><br>His email: <a  style="text-decoration:none;font-weight: bold;color:#ff6426" href="/tel">{{ $userFoundUpdates->userMissing($userFoundUpdates->user_missing)->email }}</a><br>And his phone number: <a style="text-decoration:none;font-weight: bold;color:#ff6426" href="/tel">{{ $userFoundUpdates->userMissing($userFoundUpdates->user_missing)->phone_number }}</a><br>Now you can contact him to give him his <span style="font-weight: bold">{{ $userFoundUpdates->found($userFoundUpdates->found_id)->description }}</span></h4>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        @if (!($founds->isEmpty()))
                            <h2 class="text-center mb-5">Found Things</h2>
                            <div class="row mb-4">
                                <div class="col-sm-3">
                                    <p >Image</p>
                                </div>
                                <div class="col-sm-3">
                                    <p >Description</p>
                                </div>
                                <div class="col-sm-2">
                                    <p >Location</p>
                                </div>
                                <div class="col-sm-2">
                                    <p>Date</p>
                                </div>
                                <div class="col-sm-2">
                                    <p>Action</p>
                                </div>
                            </div>
                            <hr>
                            @foreach ($founds as $found)
                                <div class="row mb-4">
                                    <div class="col-sm-3">
                                        <img class="account-found-image mb-0" src="{{ asset('assets/img') }}/{{ $found->image }}" alt="">
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="text-muted">{{ $found->description }}</p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-muted">{{ $found->location }}</p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-muted ">{{ $found->date }}</p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-muted "><a href="{{ route('found.delete',['id' => $found->id]) }}" class="btn btn-danger">Delete</a></p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row mb-4 text-center">
                                <div class="col-sm-12">
                                    <p class="text-muted mb-3">You didn't share with us the things you found !</p>
                                    <p class="text-muted "><a href="{{ route('found.index') }}" class="btn btn-info">let's Share</a></p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        @if (!($losts->isEmpty()))
                        <h2 class="text-center mb-5">Your Missing Things</h2>
                            <div class="row mb-4">
                                <div class="col-sm-3">
                                    <p >Description</p>
                                </div>
                                <div class="col-sm-3">
                                    <p >Location</p>
                                </div>
                                <div class="col-sm-3">
                                    <p>Date</p>
                                </div>
                                <div class="col-sm-3">
                                    <p>Action</p>
                                </div>
                            </div>
                        <hr>
                            @foreach ($losts as $lost)
                                <div class="row mb-4">
                                    <div class="col-sm-3">
                                        <p class="text-muted">{{ $lost->description }}</p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="text-muted">{{ $lost->location }}</p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="text-muted ">{{ $lost->date }}</p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="text-muted "><a href="{{ route('lost.delete',['id' => $lost->id]) }}" class="btn btn-danger">Delete</a></p>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <div class="row mb-4 text-center">
                                <div class="col-sm-12">
                                    <p class="text-muted mb-3">You didn't share with us the missing things !</p>
                                    <p class="text-muted "><a href="{{ route('lost.index') }}" class="btn btn-info">let's Share</a></p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection