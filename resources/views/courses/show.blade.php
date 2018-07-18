@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-3">
            <div class="card events-card">
                <header class="card-header">
                    <p class="card-header-title">
                        Course Lists
                    </p>
                </header>
                <div class="card-table">
                    <div class="content">
                        <table class="table is-fullwidth is-striped">
                            <tbody>
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td>Lorum ipsum dolem aire</td>
                                    <td><a class="button is-small is-primary" href="#">Action</a></td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td>Lorum ipsum dolem aire</td>
                                    <td><a class="button is-small is-primary" href="#">Action</a></td>
                                </tr>
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td>Lorum ipsum dolem aire</td>
                                    <td><a class="button is-small is-primary" href="#">Action</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br/>

            <div class="card events-card">
                <header class="card-header">
                    <p class="card-header-title">
                        Attachments
                    </p>
                    <span class="card-header-icon" aria-label="more options">
                        <span class="icon">
                            <i class="fa fa-chain" aria-hidden="true"></i>
                        </span>
                    </span>
                </header>
                <div class="card-table">
                    <div class="content">
                        <table class="table is-fullwidth is-striped">
                            <tbody>
                                <tr>
                                    <td width="5%"><i class="fa fa-film"></i></td>
                                    <td>Download #1</td>
                                    <td><a class="button is-small is-success is-pulled-right" href="#"><i class="fa fa-download"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br/>
            <a href="" class="button is-fullwidth"><i class="fa fa-angle-double-left"></i>&nbsp;Back</a>
        </div>
        <div class="column is-9">
            <course-show encoded_course="{{ json_encode($course) }}"></course-show>
        </div>
    </div>
</div>
@endsection
