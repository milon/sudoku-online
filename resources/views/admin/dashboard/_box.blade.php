<div class="small-box bg-{{ $color or 'teal' }}">
    <div class="inner">
        <h3>{{ $count }}</h3>
        <p>{{ $title }}</p>
    </div>
    <div class="icon">
        <i class="{{ $icon }}"></i>
    </div>
    <a href="{{ $url }}" class="small-box-footer">
        Details <i class="fa fa-arrow-circle-right"></i>
    </a>
</div>
