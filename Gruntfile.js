module.exports = function (grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),


        clean: {
            build: {
                src: ['<%= pkg.textdomain %>']
            },
            temp: {
                src: ['<%= pkg.textdomain %>/source']
            }
        },

        zip: {
            './<%= pkg.textdomain %>.zip': ['<%= pkg.textdomain %>/**']
        },

        replace: {
            dist: {
                options: {
                    variables: {
                        'name': '<%= pkg.name %>',
                        'homepage': '<%= pkg.homepage %>',
                        'author': '<%= pkg.author.name %>',
                        'author_url': '<%= pkg.author.url %>',
                        'description': '<%= pkg.description %>',
                        'version': '<%= pkg.version %>',
                        'license': '<%= pkg.license.name %>',
                        'license_version': '<%= pkg.license.version %>',
                        'license_url': '<%= pkg.license.url %>',
                        'textdomain': '<%= pkg.textdomain %>'
                    },
                    prefix: '@@'
                },
                files: [
                    {
                        expand: true,
                        flatten: false,
                        src: ['source/template/**'],
                        dest: './<%= pkg.textdomain %>/',
                        rename: function (dest, src) {
                            return dest + src.replace('source/template/', '').replace('textdomain', '<%= pkg.textdomain %>');
                        }
                    },
                    {
                        expand: true,
                        flatten: true,
                        src: ['source/README.md'],
                        dest: './'
                    }
                ]
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-zip');
    grunt.loadNpmTasks('grunt-replace');

    grunt.registerTask('build', ['clean:build', 'replace', 'clean:temp', 'zip']);
    grunt.registerTask('default', ['build']);

};