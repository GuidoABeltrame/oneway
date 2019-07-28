module.exports = function(grunt) {
  grunt.initConfig({
    sprite:{
      all: {
        src: 'images/icons/sprites/*.png',
        destImg: 'images/spritesheet.png',
        destCSS: 'css/sprites.css',
        algorithm: 'binary-tree'
      }
    }
  });
 
  // Cargar tarea
  grunt.loadNpmTasks('grunt-spritesmith');
};