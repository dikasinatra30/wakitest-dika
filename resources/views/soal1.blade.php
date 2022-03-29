@extends('app')

@push('content')
    <div class="home">
        <div class="card">
            <div class="card-header">
                Soal 1
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form method="get">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Kata</label>
                                <div class="col-sm-9">
                                    <input type="text" name="kata" class="form-control" placeholder="Input Kata">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Result</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold mb-0">Result :</p>
                        <div>
                            {{ $kata }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush