@props(['styles' => false])

@if($styles)
    @php
        $image = '/images/watercolor/watercolor-'.\random_int(1, 15).'.jpg';
        $path = app()->environment('local') ? $image : asset($image);
        [$imageWidth, $imageHeight] = \getimagesize(ltrim($path, '/'));
        $scaleX = collect([-1, 1])->random();
        $scale = \random_int(77, 97);
        $width = \round($imageWidth/100*$scale);
        $height = \round($imageHeight/100*$scale);
        $left = collect([\random_int(-($width/4), 0).'px', \random_int(-25, 25).'vw'])->random();
        $top = collect([\random_int(-($height/3), $height/3).'px', \random_int(0, 15).'vh'])->random();
        $rotation = \random_int(0, 360);
    @endphp
    <style type="text/css">
        .background-image { width: {{ $width }}px; height: {{ $height }}px; left: {{ $left }}; top: {{ $top }}; -webkit-transform: rotate({{ $rotation }}deg); transform: rotate({{ $rotation }}deg); transform-origin: center center; }
        .background-image:before { content: ''; position: absolute; transform: scaleX({{ $scaleX }}); background-image: url({{ $path }}); background-repeat: no-repeat; background-position: center top; background-size: contain; height: {{ $imageHeight }}px; left: 0; right: 0; top: 0; z-index: auto; transform-origin: center center; }
    </style>
@endif

@if($styles === false)
    <div class="absolute bottom-0 left-0 overflow-hidden right-0 top-0 z-0">
        <div class="background-image"></div>
    </div>
    <div class="h-16 shadow-lg sticky top-0 w-full z-10"></div>
@endif
