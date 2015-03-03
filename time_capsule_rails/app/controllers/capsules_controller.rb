class CapsulesController < ApplicationController

	def index
		@capsules = Capsule.all
	end

end
