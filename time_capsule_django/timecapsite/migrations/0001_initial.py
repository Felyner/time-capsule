# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.conf import settings


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
    ]

    operations = [
        migrations.CreateModel(
            name='TimeCapsule',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('tsCreated', models.DateTimeField(auto_now_add=True)),
                ('tsUnlock', models.DateTimeField()),
                ('timeCapID', models.IntegerField()),
                ('userID', models.ForeignKey(to=settings.AUTH_USER_MODEL)),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.CreateModel(
            name='TimeCapsuleAsset',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('timeCapAssetID', models.IntegerField()),
                ('asset', models.FileField(upload_to=b'/media/')),
                ('parentID', models.ForeignKey(to='timecapsite.TimeCapsule')),
            ],
            options={
            },
            bases=(models.Model,),
        ),
    ]
