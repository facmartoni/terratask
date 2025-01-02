<?php

  namespace App\Livewire;

  use Illuminate\Contracts\View\Factory;
  use Illuminate\Foundation\Application;
  use Illuminate\View\View;
  use Livewire\Attributes\Lazy;
  use Livewire\Component;

  #[Lazy]
  class TaskPreviewImage extends Component {
    public string $image_url;

    public function placeholder(): Application|Factory|\Illuminate\Contracts\View\View|View|string {
      return view('livewire.task-preview-image-placeholder', ['image_url' => $this->image_url]);
      // return <<<'HTML'
      //   <div class="shrink-0 size-20 bg-gray-300 animate-pulse flex items-center justify-center">
      //     <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 476 476">
      //       <path
      //         d="M 341.505 77.599 C 329.942 80.180, 305.271 90.689, 296.081 96.948 C 294.662 97.915, 290.125 100.886, 286 103.550 C 254.393 123.964, 209.709 165.532, 162.429 218.505 C 133.419 251.008, 87.135 309.313, 70.349 334.500 C 57.743 353.415, 36 387.631, 36 388.554 C 36 389.015, 37.576 387.865, 39.502 385.998 C 44.397 381.253, 46.054 383.173, 41.917 388.798 C 37.831 394.355, 38.692 396.510, 42.905 391.268 C 47.479 385.576, 86.699 348.611, 109.344 328.650 C 189.474 258.016, 253.962 216.007, 295.208 207.576 C 308.439 204.871, 320.328 205.966, 327.216 210.524 C 335.500 216.006, 340.120 232.800, 337.006 246.110 C 331.870 268.063, 309.952 290.758, 277 308.241 C 246.419 324.467, 208.347 336.210, 156 345.561 C 148.025 346.986, 140.719 348.568, 139.764 349.076 C 138.809 349.584, 137.276 350, 136.359 350 C 134.864 350, 134.885 350.215, 136.555 352.061 C 138.088 353.755, 138.175 354.274, 137.041 354.974 C 135.407 355.984, 139.202 356.569, 156.500 357.975 C 208.505 362.201, 246.442 361.605, 285.359 355.948 C 344.496 347.352, 389.065 325.826, 412.150 294.711 C 424.054 278.667, 429.309 263.665, 429.388 245.500 C 429.476 225.217, 423.997 211.908, 409.580 197.386 C 396.514 184.226, 387.365 180.233, 373.295 181.551 C 369.039 181.950, 366 181.853, 366 181.317 C 366 179.314, 368.605 178, 372.580 178 C 376.291 178, 377.144 177.524, 380.194 173.750 C 398.631 150.939, 404.241 118.911, 393.315 98.837 C 389.686 92.169, 379.305 82.487, 372.392 79.322 C 365.109 75.988, 352.001 75.256, 341.505 77.599"
      //         stroke="none" fill="#ffffff" fill-rule="evenodd"/>
      //     </svg>
      //   </div>
      //   HTML;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View {
      // sleep(3);
      return view('livewire.task-preview-image');
    }
  }
