document.querySelectorAll('.editor').forEach(editorElement => {
    ClassicEditor
        .create(editorElement, {
            // Editor configuration.
        })
        .then(editor => {
            window.editor = editor; // Optional: Assigns the editor instance to a global variable
        })
        .catch(handleSampleError);
});

function handleSampleError(error) {
    const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

    const message = [
        'Oops, something went wrong!',
        `Please, report the following error on ${issueUrl} with the build id "jmpcmxseambi-vo64egvrqxia" and the error stack trace:`
    ].join('\n');

    console.error(message);
    console.error(error);
}