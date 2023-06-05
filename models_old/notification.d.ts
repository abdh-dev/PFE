type Notification = {
  id: number
  notified_at: string /* Date */
  action_type: string
  action_details: string
  read_at: string /* Date */ | null
  user_id: number
  created_at: string /* Date */ | null
  updated_at: string /* Date */ | null
}
