type User = {
  id?: number
  username: string
  first_name: string
  last_name: string
  email: string
  email_verified_at: string /* Date */
  role: number
  preference: string
  created_at: string /* Date */ | null
  updated_at: string /* Date */ | null
}
