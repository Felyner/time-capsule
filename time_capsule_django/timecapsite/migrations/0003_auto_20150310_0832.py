# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('timecapsite', '0002_auto_20150310_0333'),
    ]

    operations = [
        migrations.AlterField(
            model_name='timecapsule',
            name='tsCreated',
            field=models.DateTimeField(verbose_name=datetime.date(2015, 3, 10)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='timecapsuleasset',
            name='asset',
            field=models.FileField(upload_to=b'files/%Y/%m/%d'),
            preserve_default=True,
        ),
    ]
