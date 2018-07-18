@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-3">
            {{-- <div class="card events-card">
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

            <br/> --}}

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
                                @if (!empty($course['attachments']))
                                    @foreach ($course['attachments'] as $attachment)
                                    <tr>
                                        <td width="5%">
                                            @if ($attachment['type'] == 'video')
                                                <i class="fa fa-film"></i>
                                            @elseif ($attachment['type'] == 'image')
                                                <i class="fa fa-picture-o"></i>
                                            @elseif ($attachment['type'] == 'application')
                                                <i class="fa fa-file"></i>
                                            @endif
                                        </td>
                                        <td title="{{ $attachment['name'] }}">{{ str_limit($attachment['name'], 12) }}</td>
                                        <td>
                                            @php
                                                $type = str_plural($attachment['type']);
                                                $encrypted_download_path = encrypt("{$type}/{$attachment['name']}");
                                            @endphp

                                            <a class="button is-small is-success is-pulled-right"
                                                href="{{ route('download', $encrypted_download_path) }}"
                                            >
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3"><small>There is no attachments.</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br/>

            @if ($user['role']['key'] != 'student')
                <a href="{{ route('courses.index') }}" class="button is-fullwidth"><i class="fa fa-angle-double-left"></i>&nbsp;Back</a>
            @endif
        </div>
        <div class="column is-9">
            <course-show encoded_user="{{ json_encode($user) }}" token="{{ csrf_token() }}" encoded_course="{{ json_encode($course) }}"></course-show>
        </div>
    </div>
</div>
@endsection
