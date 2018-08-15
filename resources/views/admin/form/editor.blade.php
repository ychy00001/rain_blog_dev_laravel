<script src="http://cdn.bootcss.com/marked/0.3.2/marked.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/codemirror/4.10.0/codemirror.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/zeroclipboard/2.2.0/ZeroClipboard.min.js"></script>
{{--<script type="text/javascript" src="{{ asset('plugin/editor/js/highlight.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('plugin/editor/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/MIDI.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/fileupload.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/bacheditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/bootstrap3-typeahead.js') }}"></script>

<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="editor {{$viewClass['field']}}">

        @include('admin::form.error')

        <textarea class="form-control" id="myEditor" name="{{$name}}" placeholder="{{ $placeholder }}" {!! $attributes !!} >{{ old($column, $value) }}</textarea>

        @include('admin::form.help-block')

    </div>
</div>

<script>
    $(function() {
        let url = "{{ url(config('editor.uploadUrl')) }}";
        @if(config('editor.ajaxTopicSearchUrl',null))
            ajaxTopicSearchUrl = "{{ url(config('editor.ajaxTopicSearchUrl')) }}";
        @else
            ajaxTopicSearchUrl = null;
                @endif

        let myEditor = new Editor(url,ajaxTopicSearchUrl);
        myEditor.render('#myEditor');
    });
</script>
