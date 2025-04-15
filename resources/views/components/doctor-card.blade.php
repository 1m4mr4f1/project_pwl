@props(['id', 'name', 'desc', 'image', 'modalId'])

<div class="col">
    <div class="card h-100">
        <img src="{{ $image }}" class="card-img-top" alt="{{ $name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text">{{ $desc }}</p>
            <button type="button" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">
                Selengkapnya ..
            </button>
        </div>
    </div>
</div>
