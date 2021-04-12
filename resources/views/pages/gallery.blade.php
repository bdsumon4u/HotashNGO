<x-site-layout>
    @push('styles')
        <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
    @endpush
        <div class="gallery-area ptb-100">
        <div class="container">
            <div class="row">
                @foreach($images as $image)
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-item">
                        <a href="{{ $image->getFullUrl() }}" @if($image->type === 'image') data-lightbox="roadtrip" @else data-toggle="modal" data-target="#video-{{ $image->id }}" @endif>
                            <img src="{{ $image->type === 'video' ? asset('storage/video_player_placeholder.gif') : $image->getFullUrl('416x234') }}" alt="Gallery">
                            <i class="icofont-eye"></i>
                        </a>
                    </div>
                    @if($image->type === 'video')
                    <!-- The Modal -->
                    <div class="modal" id="video-{{ $image->id }}">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <video class="w-100" controls src="{{ route('video-stream', $image) }}"></video>
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
                {{ $images->links('pages.partials.pagination') }}
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
    @endpush
</x-site-layout>
