from django.db import models
from django.contrib.auth.models import User

class TimeCapsule(models.Model):
    name = models.CharField(max_length = 200)
    date_created = models.DateTimeField('date created')
    date_unlock = models.DateTimeField('date unlock')
    # Add more fields here later
