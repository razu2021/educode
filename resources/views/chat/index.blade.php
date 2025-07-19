@extends('layouts.chatmaster')
@section('chat_content')



<div class="container mt-5">
    <div class="card card-chat overflow-hidden">
            <div class="card-body d-flex p-0 h-100">
              <div class="chat-sidebar">
                <div class="contacts-list scrollbar-overlay simplebar-scrollable-y" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                  <div class="nav nav-tabs border-0 flex-column" role="tablist" aria-orientation="vertical">
                    <div class="hover-actions-trigger chat-contact nav-item active" role="tab" id="chat-link-0" data-bs-toggle="tab" data-bs-target="#chat-0" aria-controls="chat-0" aria-selected="true">
                      <div class="d-md-none d-lg-block">
                        <div class="dropdown dropdown-active-trigger dropdown-chat"><button class="hover-actions btn btn-link btn-sm text-400 dropdown-caret-none dropdown-toggle end-0 fs-9 mt-4 me-1 z-1 pb-2 mb-n2" type="button" data-boundary="viewport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-cog fa-w-16" data-fa-transform="shrink-3 down-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.75em;"><g transform="translate(256 256)"><g transform="translate(0, 128)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-cog" data-fa-transform="shrink-3 down-4"></span> Font Awesome fontawesome.com --></button>
                          <div class="dropdown-menu dropdown-menu-end border py-2 rounded-2"><a class="dropdown-item" href="#!">Mute</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Mark as Unread</a><a class="dropdown-item" href="#!">Something's Wrong</a><a class="dropdown-item" href="#!">Ignore Messsages</a><a class="dropdown-item" href="#!">Block Messages</a>
                          </div>
                        </div>
                      </div>
                       @forelse ($users as $user)
                      <div class="d-flex p-3">
                        <div class="avatar avatar-xl status-online">
                          <img class="rounded-circle" src="{{asset('uploads/logo.jpg')}}" alt="">
                        </div>
                        <div class="flex-1 chat-contact-body ms-2 d-md-none d-lg-block">
                          <div class="d-flex justify-content-between">
                            <h6 class="mb-0 chat-contact-title">{{$user->name}}</h6><span class="message-time fs-11">Tue</span>
                          </div>
                          <div class="min-w-0">
                            <div class="chat-contact-content pe-3">{{$user->name}} one messages</div>
                            <div class="position-absolute bottom-0 end-0 hover-hide"></div>
                          </div>
                        </div>
                      </div>
                      @empty
                         <div class="flex-1 chat-contact-body ms-2 d-md-none d-lg-block">
                          <div class="d-flex justify-content-between">
                            <h6 class="mb-0 chat-contact-title"> No Name Found !</h6><span class="message-time fs-11"></span>
                          </div>
                         
                        </div>
                    @endforelse

                    </div>

                  </div>
                </div>
            </div>
        </div>
        </div>
            <div class="simplebar-placeholder" style="width: 279px; height: 739px;">
            </div>
        </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar" style="height: 715px; transform: translate3d(0px, 0px, 0px); display: block;">
                    </div>
                </div>
            </div>
            <form class="contacts-search-wrapper">
                <div class="form-group mb-0 position-relative d-md-none d-lg-block w-100 h-100">
                <input class="form-control form-control-sm chat-contacts-search border-0 h-100" type="text" placeholder="Search contacts ...">
                <span class="fas fa-search contacts-search-icon"></span>
                </div><button class="btn btn-sm btn-transparent d-none d-md-inline-block d-lg-none"> <span class="fas fa-search fs-10"></span> </button>
            </form>
            </div>




              <div class="tab-content card-chat-content">
               
              
                <div class="tab-pane card-chat-pane active" id="chat-0" role="tabpanel" aria-labelledby="chat-link-0">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <svg class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg><!-- <div class="fas fa-chevron-left"></div> Font Awesome fontawesome.com -->
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-9">{{$receiver->name}}</h5>
                          <div class="fs-11 text-400">Active On Chat</div>
                        </div>
                      </div>
                      <div class="col-auto"><button class="btn btn-sm btn-falcon-primary btn-chat-info" type="button" data-index="0" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Conversation Information" data-bs-original-title="Conversation Information"><svg class="svg-inline--fa fa-info fa-w-6" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg=""><path fill="currentColor" d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"></path></svg><!-- <span class="fas fa-info"></span> Font Awesome fontawesome.com --></button></div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="0">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl status-online">
                            <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="">
                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">{{$receiver->name}}</a></h6>
                            <div class="dropdown z-1"><button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-cog fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z"></path></svg><!-- <span class="fas fa-cog"></span> Font Awesome fontawesome.com --></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-0"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><svg class="svg-inline--fa fa-search fa-w-16 me-1" data-fa-transform="shrink-1 down-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.6875em;"><g transform="translate(256 256)"><g transform="translate(0, 96)  scale(0.9375, 0.9375)  rotate(0 0 0)"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span> Font Awesome fontawesome.com --></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><svg class="svg-inline--fa fa-pencil-alt fa-w-16 me-1" data-fa-transform="shrink-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;"><g transform="translate(256 256)"><g transform="translate(0, 0)  scale(0.9375, 0.9375)  rotate(0 0 0)"><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span> Font Awesome fontawesome.com --></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><svg class="svg-inline--fa fa-palette fa-w-16 me-1" data-fa-transform="shrink-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="palette" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;"><g transform="translate(256 256)"><g transform="translate(0, 0)  scale(0.9375, 0.9375)  rotate(0 0 0)"><path fill="currentColor" d="M204.3 5C104.9 24.4 24.8 104.3 5.2 203.4c-37 187 131.7 326.4 258.8 306.7 41.2-6.4 61.4-54.6 42.5-91.7-23.1-45.4 9.9-98.4 60.9-98.4h79.7c35.8 0 64.8-29.6 64.9-65.3C511.5 97.1 368.1-26.9 204.3 5zM96 320c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm32-128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128-64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span> Font Awesome fontawesome.com --></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><svg class="svg-inline--fa fa-thumbs-up fa-w-16 me-1" data-fa-transform="shrink-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="thumbs-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;"><g transform="translate(256 256)"><g transform="translate(0, 0)  scale(0.9375, 0.9375)  rotate(0 0 0)"><path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span> Font Awesome fontawesome.com --></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><svg class="svg-inline--fa fa-bell fa-w-14 me-1" data-fa-transform="shrink-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.5em;"><g transform="translate(224 256)"><g transform="translate(0, 0)  scale(0.9375, 0.9375)  rotate(0 0 0)"><path fill="currentColor" d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span> Font Awesome fontawesome.com --></span>Notifications</a></div>
                        </div>
                        <hr class="my-2">
                        <div class="px-3" id="others-info-0">
                          <div class="title" id="shared-media-title-0"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-0" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-0">Shared media</a></div>
                          <div class="collapse" id="shared-media-0" aria-labelledby="shared-media-title-0" data-parent="#others-info-0">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt=""></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt=""></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt=""></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt=""></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt=""></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt=""></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl status-online me-3">
                          <img class="rounded-circle" src="{{asset('uploads/logo.jpg')}}" alt="">
                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">{{$receiver->name}}s</a></h6>
                          <p class="mb-0">You friends with {{$receiver->name}}. Say hi to start the conversation</p>
                        </div>
                      </div>
                      <div class="text-center fs-11 text-500"><span>May 5, 2019, 11:54 am</span></div>

                      @foreach ($messages as $message)
                      @if($message->sender_id !== auth()->id())
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="{{asset('uploads/logo.jpg')}}" alt="">
                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">{{ $message->text }}</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Forward" data-bs-original-title="Forward"><svg class="svg-inline--fa fa-share fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg><!-- <span class="fas fa-share"></span> Font Awesome fontawesome.com --></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive"><svg class="svg-inline--fa fa-archive fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="archive" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32V160H32v288zm160-212c0-6.6 5.4-12 12-12h104c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H204c-6.6 0-12-5.4-12-12v-8zM480 32H32C14.3 32 0 46.3 0 64v48c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16V64c0-17.7-14.3-32-32-32z"></path></svg><!-- <span class="fas fa-archive"></span> Font Awesome fontawesome.com --></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><svg class="svg-inline--fa fa-edit fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <span class="fas fa-edit"></span> Font Awesome fontawesome.com --></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove"><svg class="svg-inline--fa fa-trash-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg><!-- <span class="fas fa-trash-alt"></span> Font Awesome fontawesome.com --></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs-11"><span>11:54 am</span></div>
                          </div>
                        </div>
                      </div>
                      


                      @else
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Forward" data-bs-original-title="Forward"><svg class="svg-inline--fa fa-share fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg><!-- <span class="fas fa-share"></span> Font Awesome fontawesome.com --></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Archive" data-bs-original-title="Archive"><svg class="svg-inline--fa fa-archive fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="archive" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32V160H32v288zm160-212c0-6.6 5.4-12 12-12h104c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H204c-6.6 0-12-5.4-12-12v-8zM480 32H32C14.3 32 0 46.3 0 64v48c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16V64c0-17.7-14.3-32-32-32z"></path></svg><!-- <span class="fas fa-archive"></span> Font Awesome fontawesome.com --></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><svg class="svg-inline--fa fa-edit fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <span class="fas fa-edit"></span> Font Awesome fontawesome.com --></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove"><svg class="svg-inline--fa fa-trash-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg><!-- <span class="fas fa-trash-alt"></span> Font Awesome fontawesome.com --></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message" data-bs-theme="light">
                                <p class="mb-0">{{ $message->text }} </p>
                                <a href="../assets/img/chat/1.jpg" data-gallery="gallery-3">
                                  <img class="rounded" src="../assets/img/chat/1.jpg" alt="" width="150">
                                </a>
                              </div>
                            </div>
                            <div class="text-400 fs-11 text-end">11:54 am<svg class="svg-inline--fa fa-check fa-w-16 ms-2 text-success" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg><!-- <span class="fas fa-check ms-2 text-success"></span> Font Awesome fontawesome.com --></div>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach


                    
                    
                    </div>
                  </div>
                </div>
                 
               <form class="chat-editor-area" id="chatForm">
                @csrf
                <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $receiver->id }}">
                
                <div class="emojiarea-editor outline-none scrollbar" id="messageInput" contenteditable="true" placeholder="Type your message"></div>
                
                <input class="d-none" type="file" id="chat-file-upload">
                <label class="chat-file-upload cursor-pointer" for="chat-file-upload"><span class="fas fa-paperclip"></span></label>
                
                <div class="chat-emoji-picker">
                    <div class="btn btn-link emoji-icon" data-emoji-mart="data-emoji-mart" data-emoji-mart-input-target=".emojiarea-editor">
                        <span class="far fa-laugh-beam"></span>
                    </div>
                    <em-emoji-picker class="d-none"></em-emoji-picker>
                </div>

                <button type="submit" class="btn btn-sm btn-send shadow-none">Send</button>
            </form>

              </div>
            </div>
          </div>




















<script>
    document.getElementById('chatForm').addEventListener('submit', function (e) {
        e.preventDefault();

        let receiverId = document.getElementById('receiver_id').value;

        // Ensure clean message even if it's contenteditable
        let raw = document.getElementById('messageInput').innerHTML.trim();
        let text = raw.replace(/<[^>]+>/g, '').trim(); // remove tags

        if (!text || text.length === 0) {
            alert("Please type a message.");
            return;
        }

        fetch('{{ route('chat.send') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                receiver_id: receiverId,
                text: text
            })
        })
        .then(res => res.json())
        .then(data => {
            let msg = `
                <div class="d-flex p-3 justify-content-end">
                    <div class="bg-primary text-white p-2 rounded-2 chat-message" data-bs-theme="light">
                        ${data.text}
                    </div>
                </div>
            `;
            document.querySelector('.chat-content-scroll-area').innerHTML += msg;
            document.getElementById('messageInput').innerText = '';
        });
    });

    // Echo listener
    Echo.private(`chat.{{ auth()->id() }}`)
        .listen('MessageSent', (e) => {
            let msg = `
                <div class="d-flex p-3">
                    <div class="avatar avatar-l me-2">
                        <img class="rounded-circle" src="{{ asset('path/to/avatar.jpg') }}" alt="">
                    </div>
                    <div class="chat-message bg-200 p-2 rounded-2">
                        ${e.message.text}
                    </div>
                </div>
            `;
            document.querySelector('.chat-content-scroll-area').innerHTML += msg;
        });
</script>





@endsection