from django.conf.urls import patterns, include, url
from django.contrib import admin
from timecapsite import views as views
from django.contrib.staticfiles.urls import staticfiles_urlpatterns

urlpatterns = patterns('',
    # Examples:
    # url(r'^$', 'timecapsule.views.home', name='home'),
    # url(r'^blog/', include('blog.urls')),

    url(r'^admin/', include(admin.site.urls)),
    url(r'^$', views.Index.as_view()),
    url(r'^register/$', views.register),
    url(r'^login/$', views.loginView),
    url(r'^logout/$', views.logoutView),
    url(r'^createCapsule/$', views.createTimeCap),

)

urlpatterns += staticfiles_urlpatterns()
