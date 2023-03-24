<section class="product-category section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title text-center">
          <h2>A Journey of Ethiopian coffee with Aida</h2>
        </div>
      </div>
      @for($i = 0; $i < count($categories); $i++)
      @if(($i + 1) % 3 != 0)
      <div class="col-md-6">
        <div class="category-box">
          <a href="{{ route('shop.list', $categories[$i]->id) }}">
            <img src="{{ asset('storage/'.$categories[$i]->photos[0]) }}" alt="" />
            <div class="content">
              <h3>{{ $categories[$i]->name }}</h3>
              <p>{{ $categories[$i]->description }}</p>
            </div>
          </a>
        </div>
        @php($i += 1)
        @if($i < count($categories))
        <div class="category-box">
          <a href="{{ route('shop.list', $categories[$i]->id) }}">
            <img src="{{ asset('storage/'.$categories[$i]->photos[0]) }}" alt="" />
            <div class="content">
              <h3>{{ $categories[$i]->name }}</h3>
              <p>{{ $categories[$i]->description }}</p>
            </div>
          </a>
        </div>
        @endif
      </div>
      @else
      <div class="col-md-6">
        <div class="category-box category-box-2">
          <a href="{{ route('shop.list', $categories[$i]->id) }}">
            <img src="{{ asset('storage/'.$categories[$i]->photos[0]) }}" alt="" />
            <div class="content">
              <h3>{{ $categories[$i]->name }}</h3>
              <p>{{ $categories[$i]->description }}</p>
            </div>
          </a>
        </div>
      </div>
      @endif
      @endfor
    </div>
  </div>
</section>