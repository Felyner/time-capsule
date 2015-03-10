from django.db import models
from django.contrib.auth.models import User
# Create your models here.

class TimeCapsule(models.Model):
	tsCreated = models.DateTimeField(auto_now_add=True)
	tsUnlock = models.DateTimeField()
	userID = models.ForeignKey(User)

class TimeCapsuleAsset(models.Model):
	parentID = models.ForeignKey(TimeCapsule)
	asset = models.FileField(upload_to='/media/')