from django.http import HttpResponse
from django.shortcuts import render
from.models import Album

def Index(request):
    all_albums = Album.objects.all()
	template = loader.get_template('music/index.html')  
     return render(request, 'music/index.html', context)
	 
def detail(request, album_id);
     return HttpResponse("<h2>Details for Album id: " + str(album_id) + "</h2>")\
	 