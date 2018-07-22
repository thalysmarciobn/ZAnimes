@extends('layouts.pages_full')

@section('title', 'DMCA')

@section('header')
    <div class="c-search-header__wrapper">
        <div class="container">
            <div class="c-breadcrumb-wrapper">
                <div class="container">
                    <div class="col-md-12">
                        <div class="c-breadcrumb">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{ route('home') }}">
                                        @lang('pages.menu.home')
                                    </a>
                                </li>
                                <li class="active">
                                    DMCA
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('container')
    <div class="widget col-md-12">
        <div class="c-widget-wrap">
            <div class="c-blog__heading style-2 font-heading">
                <h4>
                    DMCA
                </h4>
            </div>
            <div class="tab-content-wrap">

                zanimes.com implements the following DMCA Notice and Takedown Policy. ZAnimes respects the intellectual property rights of third parties, and expects others to do the same. As part of our effort to recognize the copyrights of third parties, ZAnimes complies with the U.S. Digital Millennium Copyright Act ("DMCA") and is therefore protected by the limitations on liability recognized by 47 U.S.C. § 512; commonly known as the "safe harbor" provisions of the DMCA.

                <h2 style="font-size:16px;">Notification</h2>

                We take abuse of our service very seriously. If you wish to report a copyright infringement, we need you to send us a proper notification.
                <br>
                A proper notification MUST have at least the following information, or it may be IGNORED:
                <br>
                <br>
                1. Identify yourself as either:
                <br>
                <br>
                - The owner of a copyrighted work(s), or
                <br>
                - A person authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.
                <br>
                2. State your contact information, including your TRUE NAME, street address, telephone number, and email address.
                <br>
                3. Identify the copyrighted work that you believe is being infringed, or if a large number of works are appearing at a single website, a representative list of the works.
                <br>
                4. Identify the material that you claim is infringing your copyrighted work, to which you are requesting that FreakShare disable access over the World Wide Web.
                <br>
                5. Identify the location of the material on the World Wide Web by providing information reasonably sufficient to permit FreakShare to locate the material.
                <br>
                6. State that you have a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agents, or the law.
                <br>
                7. State that the information in the notice is accurate, under penalty of perjury.
                <br>
                <br>
                Claimants may send their Notice of Claimed Infringement to:
                <br>
                <br>
                DMCA Complaints
                <br>
                zanimes.com
                <br>
                <h4>Email: contact@zanimes.com</h4>
                <br>
                Please do not send other inquires or information to our Designated Agent.
                <br>
                All claims of copyright infringement on or regarding this website should be delivered ONLY to ZAnimes designated copyright agents.
            </div>
        </div>
    </div>
@stop
