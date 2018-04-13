module.exports = function(grunt){

  grunt.initConfig({
  	// setting folder templates
		dirs: {
			css: 'assets/css',
			js: 'assets/js'
		},


		// Minify all .css files.
		cssmin: {
			minify: {
				expand: true,
				cwd: '<%= dirs.css %>/',
				src: ['*.css'],
				dest: '<%= dirs.css %>/',
				ext: '.min.css'
			}
		},

		// Minify .js files.
		uglify: {
			options: {
				preserveComments: 'some'
			},
			jsfiles: {
				files: [{
					expand: true,
					cwd: '<%= dirs.js %>/',
					src: [
						'*.js',
						'!*.min.js',
						'!Gruntfile.js',
					],
					dest: '<%= dirs.js %>/',
					ext: '.min.js'
				}]
			}
		},

	    });

    grunt.loadNpmTasks('grunt-contrib-cssmin' );
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-img');


 // Register tasks
	grunt.registerTask( 'default', [
                										'cssmin',
                										'uglify'
                									]);


};
