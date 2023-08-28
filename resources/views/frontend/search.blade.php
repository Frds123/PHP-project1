<x-frontend.layouts.master>
    <div id="memberProfile" class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <h2>Member Profile</h2>
                </div>
            </div>
        </div>
              <div class="col-lg-12">
                <div class="col-lg-9">

                </div>
                <div class="col-lg-3">
                <form action="{{ route('members.search') }}" method="GET" role="search">
                    @csrf
                       <input type="search" value="" name="search">
                       <!-- <input type="submit"> -->
                       <button type="submit">Searh</button>
                     </form>
                </div>
              </div>

        <div class="shape1"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape1.png" alt="shape"></div>
        <div class="shape2 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape2.svg" alt="shape"></div>
        <div class="shape3"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape3.svg" alt="shape"></div>
        <div class="shape4"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"></div>
        <div class="shape5"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape5.png" alt="shape"></div>
        <div class="shape6 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape">
        </div>
        <div class="shape7"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"></div>
        <div class="shape8 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape2.svg" alt="shape">
        </div>
    </div>
    <!-- Start Member Profile Area -->
    <div class="team-area ptb-80 bg-f9f6f6">
        <div class="container">
            <div class="row">
                {{-- @dd($members); --}}
                @forelse ($searchOption as $member)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-team">
                            <div class="team-image">

                                @if (isset($member->profile))
                                    @if (file_exists(storage_path() . '/app/public/profile/' . $member->profile->profile_pic) && !is_null($member->profile->profile_pic))
                                        <img src="{{ asset('storage/profile/' . $member->profile->profile_pic) }}"
                                            width="320" height="240" />
                                    @else
                                        <img src="{{ asset('default.png') }}" width="320" height="240" />
                                    @endif
                                @endif
                            </div>
                            <div class="team-content">
                                <div class="team-info">

                                    <h3>{{ $member->name ?? '' }}</h3>
                                    <span>{{ $member->profile->designation ?? '' }}</span>
                                </div>
                                <p>
                                    Organization:
                                    {{ $member->profile ? $member->profile->organization : 'No Organization' }} <br>

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
                                    Mobile No: {{ $member->profile ? $member->profile->mobile_no : '' }}<br>
                                    Blood Group: {{ $member->profile ? $member->profile->blood_group : '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                <div class="col-lg-12 col-md-12">
                    <div class="pagination-area">
                        <nav aria-label="Page navigation">
                            {{ $searchOption->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend.layouts.master>
