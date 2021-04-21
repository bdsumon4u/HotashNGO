<x-site-layout>
    @push('styles')
        <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
    @endpush
        <div class="gallery-area ptb-100">
        <div class="container">
            <div class="row">
                @foreach($media as $medium)
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="{{ $medium->getFullUrl() }}" @if($medium->type === 'image') data-lightbox="roadtrip" @else data-toggle="modal" data-target="#video-{{ $medium->id }}" @endif>
                            <img src="{{ $medium->type === 'video' ? asset($medium->getCustomProperty('video-thumb')) : $medium->getFullUrl('416x234') }}" alt="Gallery">
                            <i class="icofont-{{ $medium->type === 'image' ? 'eye' : 'play' }}"></i>
                        </a>
                    </div>
                    @if($medium->type === 'video')
                    <!-- The Modal -->
                    <div class="modal" id="video-{{ $medium->id }}">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <video class="w-100" controls src="{{ route('video-stream', $medium) }}"></video>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            <div class="pagination-area">
                {{ $media->links('pages.partials.pagination') }}
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
    @endpush
</x-site-layout>
