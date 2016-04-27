$.getScript('http://cdnjs.cloudflare.com/ajax/libs/dropzone/3.8.4/dropzone.min.js',function(){

  angular.module('dropZone', [])
  .directive('dropZone', function() {
    
    
    return function(scope, element, attrs) {
      
      element.dropzone({ 
        url: "/upload",
        maxFilesize: 100,
        paramName: "uploadfile",
        maxThumbnailFilesize: 5,
        init: function() {
          scope.files.push({file: 'added'}); // here works
          this.on('success', function(file, json) {
          });
          
          this.on('addedfile', function(file) {
            scope.$apply(function(){
              alert(file);
              scope.files.push({file: 'added'});
            });
          });
          
          this.on('drop', function(file) {
            alert('file');
          });
          
        }
        
      });
     
      
     
      
      
    }
  });
  
    
});

$(document).ready(function() {});