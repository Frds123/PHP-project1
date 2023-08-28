
<div id="memberProfile" class="ptb-80">
    <div class="section-title">
        <h2>Member Profile</h2>
        <div class="bar"></div>
    </div>
</div>

<div class="team-area bg-f9f6f6">
    <div class="container">
        <div class="row">
            @forelse ($members as $member)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team">
                    <div class="team-image">
                        @if (file_exists(storage_path() . '/app/public/profile/' . $member->profile->profile_pic) && !is_null($member->profile->profile_pic))
                        <img src="{{ asset('storage/profile/' . $member->profile->profile_pic) }}" width="320" height="240"/>
                        @else
                            <img src="{{ asset('default.png') }}" width="320" height="240"/>
                        @endif
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>{{ $member->name ?? '' }}</h3>
                            <span>{{ $member->profile->designation ?? '' }}</span>
                        </div>
                        <!-- <ul>
                    <li><a href="#" target="_blank"><i data-feather="facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i data-feather="twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i data-feather="linkedin"></i></a></li>
                    <li><a href="#" target="_blank"><i data-feather="gitlab"></i></a></li>
                </ul> -->
                        <p>
                            Organization: {{ $member->profile ? $member->profile->organization : 'No Organization' }} <br>

                            @forelse ($member->relationalinfo as $user)
                                @if ($user->relation == 'Husband')
                                    Spouse : {{ $user->name ?? '' }}
                                @elseif($user->relation == 'Spouse')
                                    Spouse : {{ $user->name ?? '' }}
                                @endif
                            @empty

                            @endforelse

                            <br>
                            Email: {{ $member->email ?? '' }}<br>
                            Mobile No: {{ $member->profile ? $member->profile->mobile_no : '' }}
                        </p>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
            <div class="col-lg-12 col-md-6 d-flex
                justify-content-center">
                <a href="{{ route('members.index') }}" class="btn btn-primary">View
                    More</a>
            </div>
        </div>
    </div>
</div>
