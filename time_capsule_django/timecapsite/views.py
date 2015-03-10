from django.shortcuts import render
from django.views.generic.base import TemplateView
from timecapsite.models import TimeCapsule, TimeCapsuleAsset
from timecapsite.forms import Registration
from django.template import RequestContext
from django.http import HttpResponseRedirect, HttpResponse
from django.contrib.auth import authenticate, login, logout


# Create your views here.

class Index(TemplateView):
	template_name = 'index.html'

def register(request):
	registered = False
	#authUser = request.POST.get('username') or ''
	if request.method == 'POST':
		registration = Registration(data=request.POST)
		if registration.is_valid():
			new_user = registration.save()
			new_user.set_password(new_user.password)
			new_user.save()
			registered = True
			
			authenticated_user = authenticate (username=request.POST['username'], password = request.POST['password'])
			login(request, authenticated_user)
			return HttpResponseRedirect('/')
	else:
		registration = Registration()
	return render(
            request,
            'register.html',
            {'registration': registration})

def loginView(request):
	#authenticated_user = authenticate (username=request.POST['username'], password = request.POST['password'])
	#login(request, authenticated_user)
	
	if request.method == "POST":
		authenticated_user = authenticate (username=request.POST['username'], password = request.POST['password'])
		login(request, authenticated_user)
		return HttpResponseRedirect('/')
	return render(
			request, 
			'login.html',)

def logoutView(request):
	logout(request)
	return HttpResponseRedirect('/')

def createTimeCap(request):
	timeCapsule = TimeCapsule(tsUnlock=request.POST.get('tsUnlock'), userID = request.user)
	timeCapsule.save()
	return HttpResponseRedirect('/')
	