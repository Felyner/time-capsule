from django.db import models
from django.contrib.auth.models import User

class TimeCapsule(models.Model):
	tsCreated = models.DateTimeField()
	tsUnlock = models.DateTimeField()
	userID = models.ForeignKey(User)

class TimeCapsuleAsset(models.Model):
	parentID = models.ForeignKey(TimeCapsule)
	asset = models.FileField(upload_to='files/%Y/%m/%d')