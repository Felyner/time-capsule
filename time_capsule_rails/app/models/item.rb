class Item < ActiveRecord::Base

	has_attached_file :file
	attr_accessible :title, :description, :file

end
