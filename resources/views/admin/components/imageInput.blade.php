<input type="file" name="image" class="form-control" accept="image/*"
       onchange="updatePreview(this, 'image-preview')" >

<a href="{{ ($image) ?? '#' }}" target="_blank" {{ ($image) ?? 'style=display:none' }}><img id="image-preview"
     src="{{ ($image) ?? 'https://via.placeholder.com/400' }}"
     style="width: 100%"
                  class="rounded rounded-circle" alt="placeholder"></a>

@push('page_scripts')
    <script>
        function updatePreview(input, target) {
            let file = input.files[0];
            let reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function () {
                let img = document.getElementById(target);
                img.parentElement.style.display = "block"
                // can also use "this.result"
                img.src = reader.result;
            }
        }
    </script>
@endpush
