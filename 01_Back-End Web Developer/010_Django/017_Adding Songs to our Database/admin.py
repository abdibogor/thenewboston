from django.contrib import admin
from .models import album, Song

admin.site.register(Album)
admin.site.register(Song)

# Register your models here.
# python manage.py shell
# from music.models import Album, Song
# album = Album.objects.get(pk=)
# album1.artist
# song = Song()
# song.album = album1
# song.file_type = 'mp3'
# song.song_title = 'I hate my boyfriend'
# song.save()
# song.