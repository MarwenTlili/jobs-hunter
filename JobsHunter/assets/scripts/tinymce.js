import tinymce from 'tinymce';
import 'tinymce/themes/silver';
import 'tinymce/icons/default';
import 'tinymce/models/dom';

tinymce.init({
  // apiKey: '8ese8spen1qzym9y7h9knfl89j5r0sqwk4wwwg8j04bblrdn',
  license_key: 'gpl',
  selector: 'textarea',
  menubar: false,
  menu: {
    edit: {
      title: 'Edit',
      items: 'undo, redo, selectall'
    }
  },
  plugins: 'advlist link lists',
  toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indentt | bullist numlisundo redo',
  skin: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'oxide-dark' : 'oxide'),
  content_css: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'),
  external_plugins: {
    'lists': '/build/plugins/lists/plugin.min.js'
  }
});
