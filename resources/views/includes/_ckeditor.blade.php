<script>
    
    CKEDITOR.ClassicEditor.create(document.getElementById("{{$field['ckeditor_field']}}"), {
        
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', '|',
                'bulletedList', 'numberedList', '|',
                'indent', '|',
                'undo', 'redo',
                'fontBackgroundColor', '|',
                'link', 'insertImage', 'blockQuote', 'mediaEmbed', '|',
                'horizontalLine', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'h1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'h2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'h3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: '54' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'h5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'h6' }
            ]
        },
        
        placeholder: 'Start typing...',
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },

        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features

        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },

        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews

        htmlEmbed: {
            showPreviews: true
        },

        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators

        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },

        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration

        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },

        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.

        removePlugins: [

            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',

            'AIAssistant',
            'CKBox',
            'CKFinder',
            'EasyImage',

            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',

            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',

            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType.

            'MathType',

            // The following features are part of the Productivity Pack and require additional license.

            'SlashCommand',
            'Template',
            'DocumentOutline',
            'FormatPainter',
            'TableOfContents',
            'PasteFromOfficeEnhanced'

        ]

    });
    
</script>

<script>

    function openEditPopupBox(e, name){
        e.preventDefault();
        const blackout = document.querySelector('#blackout');
        let editPopupBox = document.querySelector('#' + name + 'EditPopupBox');
        blackout.classList.remove('hidden');
        editPopupBox.classList.remove('hidden');
    }

    function closeEditPopupBox(e, name){
        const blackout = document.querySelector('#blackout');
        let editPopupBox = document.querySelector('#' + name + 'EditPopupBox');
        blackout.classList.add('hidden');
        editPopupBox.classList.add('hidden');
        e = e || window.event;
        e.preventDefault();
    }
    
</script>