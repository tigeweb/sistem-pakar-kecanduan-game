@push('scripts')
    <script>
        const err = (e) => {
            let data = JSON.parse(e.detail.xhr.response);
            let ele;
            for (let key in data.errors) {
                if (data.errors.hasOwnProperty(key)) {
                    let tmp = key.split('.');
                    let err = $('#formActionPost').find('#' + tmp[1] + '-error');
                    if (err.length > 0) {
                        err.text(data.errors[key][0]);
                        err.addClass('error');
                        ele = ele ?? err;
                    }
                }
            }
            if (ele) {
                ele.get(0).scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }
        $('#formActionPost').on('htmx:afterRequest', function(e) {
            if (e.detail.xhr.status === 422) err(e)
            else if (e.detail.xhr.status !== 200)
                console.error('Terjadi masalah pada server', e.detail.xhr.responseText);
        })
        $('#formActionPost').on('htmx:beforeRequest', function(e) {
            $('.error').text('')
        })
    </script>
@endpush
