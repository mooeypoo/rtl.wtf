/*jshint node:true */
module.exports = function ( grunt ) {
	grunt.loadNpmTasks( 'grunt-contrib-less' );
	grunt.loadNpmTasks( 'grunt-contrib-csslint' );
	grunt.loadNpmTasks( 'grunt-cssjanus' );

	grunt.initConfig( {
		pkg: grunt.file.readJSON( 'package.json' ),
		less: {
			production: {
				files: {
					'assets/rtl.wtf.site.css': 'src/less/rtl.wtf.site.less'
				}
			}
		},
		cssjanus: {
			options: {
				generateExactDuplicates: true
			},
			dist: {
				files: {
					'assets/ltr.wtf.site.css': 'assets/rtl.wtf.site.css'
				}
			}
		},
		csslint: {
			options: {
				csslintrc: '.csslintrc'
			},
			all: [
				'assets/rtl.wtf.site.css',
				'assets/ltr.wtf.site.css',
			]
		},

	} );

	grunt.registerTask( 'default', [ 'less', 'cssjanus', 'csslint' ] );
};
