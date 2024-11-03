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
  skin_url: '/build/skins/ui/oxide',
});
