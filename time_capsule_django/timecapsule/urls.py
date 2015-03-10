from django.conf.urls import patterns, include, url
from django.contrib import admin
from timecapsite import views as views
from django.contrib.staticfiles.urls import staticfiles_urlpatterns
from django.conf import settings
from django.conf.urls.static import static

urlpatterns = patterns('',
    # Examples:
    # url(r'^$', 'timecapsule.views.home', name='home'),
    # url(r'^blog/', include('blog.urls')),

    url(r'^admin/', include(admin.site.urls)),
    url(r'^$', views.Index),
    url(r'^register/$', views.register),
    url(r'^login/$', views.loginView),
    url(r'^logout/$', views.logoutView),
    url(r'^createCapsule/$', views.createTimeCap),

)

urlpatterns += staticfiles_urlpatterns()
urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
