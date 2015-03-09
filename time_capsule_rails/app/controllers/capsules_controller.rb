class CapsulesController < ApplicationController

	before_filter :authenticate_user!

	def index
		@capsules = Capsule.all
	end

	def new
		@capsule = Capsule.new
	end

	def show
		@items = Item.all
	end

	def create
		@capsule = Capsule.new(capsule_params)
		@capsule.user_id = current_user.id
		if @capsule.save
			redirect_to new_item_path(:capsule_id => @capsule.id), :notice => "Time capsule successfully created."
		else
			render "new"
		end
	end

	def destroy
		Item.where(capsule_id: params[:id]).destroy_all
		Capsule.find(params[:id]).destroy
		redirect_to capsules_path
	end

	def capsule_params
		params.require(:capsule).permit(:title, :description, :unlock)
	end

end
