class Item < ActiveRecord::Base
	belongs_to :capsule
	has_attached_file :file
end
