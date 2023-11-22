<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body overflow-hidden d-flex align-items-center justify-content-center px-0">
                <div class="video-modal position-relative col col-lg-10 col-xxl-8 px-0 px-lg-4 col-xl-10">
                    <div class="videoCover">
                        <div class="videoWrapper">
                            <iframe id="videoIframe" width="100%" height="100%"
                                src="https://www.youtube.com/embed/ynB-hIP6eK4?si=kg5bZF2keflXHHdY"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <!-- <video width="100%" height="100%" controls>
                                    <source id="videoIframe" src="" type="video/mp4">
                                </video> -->
                        </div>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"><img src="{{asset('assets/images/static/icon/svg/plus.svg')}}" alt=""></button>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hizmetModal" tabindex="-1" aria-labelledby="hizmetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body overflow-hidden d-flex align-items-center justify-content-center">
                <div class="col-lg-6 col-10 desc px-2 px-lg-3">
                    <h1 class="modal-title"></h1>
                    <div class="paragraph modal-desc">
                        
                    </div>

                </div>
                <div class="col-lg-6 col-12 swiperContent px-lg-3">
                    <div class="carouselSlider swiper">
                        <div class="swiper-wrapper modal-slider">
                          
                        </div>
                        <div class="col-xl-10 col-12 px-lg-3 px-4 swiperPaginationWrapper modal-type position-absolute end-0 mx-auto start-0 justify-content-center">
                            <div class="swiper-pagination type2 p-xl-4 px-3"></div>
                        </div>
                    </div>
                    
                </div> 
            </div>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
            aria-label="Close"><img src="{{asset('assets/images/static/icon/svg/plus.svg')}}"
                alt=""></button>
        </div>
    </div>
</div>