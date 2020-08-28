<div id="social-share{{ Hashids::connection('post')->encode($post_id) }}" class="modal share-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                
                <h3>Share Post</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                    <span class="close-modal">
                        <i data-feather="x"></i>
                    </span>
                </div>
            </div>
            
            <div class="card-body">
                
                <button type="button" class="fancybox-share__button fancybox-share__button--fb text-white" data-sharer="facebook" data-url="{{ url('post') }}/{{ Hashids::connection('post')->encode($post_id) }}">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m287 456v-299c0-21 6-35 35-35h38v-63c-7-1-29-3-55-3-54 0-91 33-91 94v306m143-254h-205v72h196"></path>
                    </svg>
                    <span>Facebook</span>
                </button>

                <button type="button" class="fancybox-share__button fancybox-share__button--tw text-white" data-sharer="twitter" data-url="{{ url('post') }}/{{ Hashids::connection('post')->encode($post_id) }}">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    	<path d="m456 133c-14 7-31 11-47 13 17-10 30-27 37-46-15 10-34 16-52 20-61-62-157-7-141 75-68-3-129-35-169-85-22 37-11 86 26 109-13 0-26-4-37-9 0 39 28 72 65 80-12 3-25 4-37 2 10 33 41 57 77 57-42 30-77 38-122 34 170 111 378-32 359-208 16-11 30-25 41-42z"></path>
                    </svg>
                    <span>Twitter</span>
                </button>

                <button type="button" class="fancybox-share__button fancybox-share__button--wa text-white" data-sharer="whatsapp" data-url="{{ url('post') }}/{{ Hashids::connection('post')->encode($post_id) }}">
                    <svg viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg">
                    	<path d="M90 43.84c0 24.214-19.78 43.842-44.182 43.842a44.256 44.256 0 0 1-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 0 1-6.34-22.637C1.635 19.63 21.415 0 45.818 0 70.223 0 90 19.628 90 43.84zM45.818 6.983c-20.484 0-37.146 16.535-37.146 36.86 0 8.064 2.63 15.533 7.076 21.61l-4.64 13.688 14.274-4.537a37.128 37.128 0 0 0 20.437 6.097c20.48 0 37.145-16.533 37.145-36.857S66.3 6.983 45.818 6.983zm22.31 46.956c-.272-.447-.993-.717-2.075-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.36-1.717-.54-2.438.536-.72 1.076-2.797 3.495-3.43 4.212-.632.72-1.263.81-2.347.27-1.082-.536-4.57-1.672-8.708-5.332-3.22-2.848-5.393-6.364-6.025-7.44-.63-1.076-.066-1.657.475-2.192.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.718.182-1.345-.09-1.884-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.793-2.436-1.793-.63 0-1.353-.09-2.075-.09-.722 0-1.896.27-2.89 1.344-.99 1.077-3.788 3.677-3.788 8.964 0 5.288 3.88 10.397 4.422 11.113.54.716 7.49 11.92 18.5 16.223 11.01 4.3 11.01 2.866 12.996 2.686 1.984-.18 6.406-2.6 7.312-5.107.9-2.513.9-4.664.63-5.112z"></path>
                    </svg>
                    <span>Whatsapp</span>
                </button>
                <input class="fancybox-share__input" type="text" value="{{ url('post') }}/{{ Hashids::connection('post')->encode($post_id) }}" onclick="select()">
            </div>
            
        </div>

    </div>
</div>