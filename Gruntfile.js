module.exports = function(grunt) {
  //Project Configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    project: {
      name: 'GtechNY',
      website: 'https://www.github.com/plummera/GtechNY/',
      author: 'Anthony T. Plummer',
      css: 'main.css',
      scss: 'build/styles.scss',
      js: 'build/<%= pkg.name %>.min.js'
    },

    meta: {
      version: '0.1'
    },

    banner: '/*! <%= project.name %> - v<%= meta.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n ' +
      '* <%= project.website %>/\n' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> ' +
      '<%= project.author %>; Unlicensed for the free! */\n',

    concat: {
      options: {
        stripBanners: true,
        seperator: ';'
      },
      sass: {
        files: {
          'build/ALL.scss' : ['css/**/*.scss']
        }
      },

      css: {
        files: {
           'build/styles_core.css' : ['css/**/*.css']
        }
      },
    },

    uglify: {
      options: {
        banner: '<%= banner %>'
      },

      js: {
        files: {
          'build/<%= pkg.name %>.min.js' : 'js/**/*.js'
        }  
      },
    },

    cssmin: {
      options: {
        banner: '<%= banner %>'
      },
      css: {
        files: {
          'build/styles_core.min.css' : 'build/styles_core.css'
        }
      },
      scss: {
        files: {
          'build/styles.min.css' : 'build/styles.css'
        }
      }

    },

    sass: {
      options: {
        style: 'expanded',
        compass: true
      },
      build: {
        src: 'build/ALL.scss',
        dest: 'build/styles.css'
      }
    },

    watch: {
      options: {
        livereload: true
      },
      files: ['js/**/*.js', 'css/**/*.scss', 'css/**/*.css'],
      tasks: ['concat:sass', 'sass', 'concat:css', 'cssmin', 'uglify']
    }


  });

  // Load uglify
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-livereload');
  grunt.loadNpmTasks('grunt-contrib-compass');

  //Default
  grunt.registerTask('default', ['concat:sass', 'sass', 'concat:css', 'cssmin', 'uglify']);

};
