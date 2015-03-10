from django.shortcuts import render
#from django.views.generic.base import TemplateView
from timecapsite.models import TimeCapsule, TimeCapsuleAsset
from timecapsite.forms import Registration
from django.template import RequestContext
from django.http import HttpResponseRedirect, HttpResponse
from django.contrib.auth import authenticate, login, logout
import datetime

# Create your views here.

def Index(request):
	if request.user.is_authenticated():
		today = datetime.date.today()
		userCaps = TimeCapsule.objects.filter(userID=request.user)
		userCapsLocked = userCaps.filter(tsUnlock__gte=today)
		userCapsUnlocked = userCaps.filter(tsUnlock__lte=today)
		tcAssets = TimeCapsuleAsset.objects.filter()
	else:
		userCaps = None
		userCapsLocked = None
		userCapsUnlocked = None
		tcAssets = None
	return render(
            request,
            'index.html',
            {'userCaps': userCaps, "userCapsLocked":userCapsLocked, "userCapsUnlocked":userCapsUnlocked, "tcAssets":tcAssets})

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
	timeCapsule = TimeCapsule(tsCreated=datetime.date.today(), tsUnlock=request.POST.get('tsUnlock'), userID = request.user)
	timeCapsule.save()
	print "number of files: ", len(request.FILES)
	fileCount = 1
	for file in request.FILES:
		timeCapsuleAsset = TimeCapsuleAsset(parentID=timeCapsule, asset=request.FILES['timeCapAsset_' + str(fileCount)])
		timeCapsuleAsset.save()
		fileCount += 1
	return HttpResponseRedirect('/')
	