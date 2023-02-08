<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  function sendData()
{
  // create new tag
  const headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
    var tag_en = document.getElementById('tag-en')
    var tag_fr = document.getElementById('tag-fr')
    var tag_it = document.getElementById('tag-it')
    var tagError = document.getElementById('tagError')
    const tagRoute = document.getElementById('tag-route')
 $.ajax({
    dataType: "json",
		type: 'post',
		url: tagRoute.value,
		headers: headers,
		data: {
		  tag_en: tag_en.value,
		  tag_fr: tag_fr.value,
		  tag_it: tag_it.value,
		}
	})
	.done((data) => {
	              console.log('data' + data);
                  $('.alert').show('slow');
            })
            .fail((data) => {
                if(data.status == 422) {
                    $.each(data.responseJSON.errors, function (i, error) {
                        $('form')
                            .find('[name="' + i + '"]')
                            .addClass('input-invalid')
                            .next()
                            .append(error[0]);
                    });
                }
            });
  return false
}
  $(function() {

        $.fn.filemanager = function(type, options) {
          type = type || 'file';

          this.on('click', function(e) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/AmisDeNzong-Website/public/filemanager';
            var target_input = $('#' + $(this).data('input'));
            var target_preview = $('#' + $(this).data('preview'));
            window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
            window.SetUrl = function (items) {
              var file_path = items.map(function (item) {
                return item.url;
              }).join(',');

              // set the value of the desired input to image url
              target_input.val('').val(file_path).trigger('change');

              // clear previous preview
              target_preview.html('');

              // set or change the preview image src
              items.forEach(function (item) {
                target_preview.append(
                  $('<img>').attr('src', item.thumb_url)
                );
              });

              // trigger change event
              target_preview.trigger('change');
            };
            return false;
          });
        }

        $('#lfm').filemanager('image');

        $('#slug').keyup(function () {
          $(this).val(getSlug($(this).val()))
        })

        $('#title_en').keyup(function () {
          $('#slug').val(getSlug($(this).val()))
        })
    })
      CKEDITOR.replace('content_en', { customConfig: '{{ asset('js/ckeditor.js') }}' });
      CKEDITOR.replace('content_fr', { customConfig: '{{ asset('js/ckeditor.js') }}' });
      CKEDITOR.replace('content_it', { customConfig: '{{ asset('js/ckeditor.js') }}' });
</script>